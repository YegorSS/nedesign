<?php
namespace backend\modules\calculator\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Products;
use common\models\Prices;
use common\models\Services;
use common\models\Variants;
use common\models\Size;
use common\models\Colors;
use common\models\Relations;
use common\models\Matrelations;
use common\models\Materials;
use common\models\Kurs;
use Yii;


class CalculatorController extends Controller
{
    // ...
   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['result', 'index', 'logout', 'updateprice', 'createproduct', 'editproduct', 'deleteproduct',
                                      'createvariant', 'deletevariant', 'editvariant', 'createsize', 'editsize',
                                      'deletesize', 'createcolor', 'editcolor', 'deletecolor', 'createservice',
                                      'editservice', 'deleteservice', 'updatematerialprice', 'creatematerial', 
                                      'deletematerial', 'creatematrelation', 'editmaterial', 'deletematrelation', 'updatekurs'],
                        'allow' => true,
                        'roles' => ['admin', 'manager'],
                    ],
                ],
            ],
            ];
    }
    
    public function actionIndex()
    {
      //$products = Products::find()->all();  
      //return $this->render('index', ['products' => $products]);
      $product = Products::find()->one();
      return $this->redirect(['result', 'id' => $product->id]);
    }
    
    public function actionResult($id){
      $this->layout = 'layout';
      $kurs = Kurs::findOne(1);
      $products = Products::find()->all();  
      $product = $this->findProduct($id);
      $services = Services::find()->all();
      $workprice = Prices::find()->where(['product_id' => $product->id]);
      $newprice = new Prices;
      $materials = Materials::find()->all();
      
      
      if ($product->load(Yii::$app->request->post()) && $product->validate()) {
        $product->formula = $_POST["Products"]["formula"];
        $product->save();
      }
      
      if (isset($_POST["Prices"]["id"])){
        $price = Prices::findOne($_POST["Prices"]["id"]);
        $price->price = str_replace(",", ".", $_POST["Prices"]["price"]);
        $price->save();
      }

      if (isset($_POST["Prices"]["color_id"]) && isset($_POST["Prices"]["size_id"])){
        $price = new Prices;
        $price->color_id = $_POST["Prices"]["color_id"];
        $price->size_id = $_POST["Prices"]["size_id"];
        $price->price = str_replace(",", ".", $_POST["Prices"]["price"]);
        $price->save();
      }
      return $this->render('result', ['product' => $product,
                                      'services' => $services,
                                      'products' => $products,
                                      'newprice' => $newprice,
                                      'materials' => $materials,
                                      'kurs' => $kurs,
                                      ]);
    }
  
  public function actionUpdateprice($id){
    if (isset($_POST["Prices"]["id"])){
        $price = Prices::findOne($_POST["Prices"]["id"]);
        $price->price = str_replace(",", ".", $_POST["Prices"]["price"]);
        $price->save();
    }
    
    if (isset($_POST["Prices"]["color_id"]) && isset($_POST["Prices"]["size_id"])){
        $price = new Prices;
        $price->color_id = $_POST["Prices"]["color_id"];
        $price->size_id = $_POST["Prices"]["size_id"];
        $price->price = str_replace(",", ".", $_POST["Prices"]["price"]);
        $price->save();
      }
  }

  public function actionUpdatekurs(){
    $kurs = Kurs::findOne(1);
    if ($kurs->load(Yii::$app->request->post()) && $kurs->validate()) {
      $kurs->save();
    }
  }

  public function actionUpdatematerialprice($id){
    $material = $this->findMaterial($id);


    if (isset($_POST["Materials"]["price"])){
      $material->price = str_replace(",", ".", $_POST["Materials"]["price"]);
      $material->save();
    }
    if (isset($_POST["Materials"]["workprice"])){
      $material->workprice = str_replace(",", ".", $_POST["Materials"]["workprice"]);
      $material->save();
    }
    
  }

  public function actionCreatematerial($product_id){
    $product = $this->findProduct($product_id);
    $material = new Materials();
    $matrelation = new Matrelations();

        if ($material->load(Yii::$app->request->post()) && $material->validate()) {
          
          $material->title = Yii::$app->request->post()["Materials"]["title"];
          $material->price = str_replace(",", ".", Yii::$app->request->post()["Materials"]["price"]);
          $material->workprice = str_replace(",", ".", Yii::$app->request->post()["Materials"]["workprice"]);
          $material->save();

          $matrelation->product_id = $product->id;
          $matrelation->material_id = $material->id;
          $matrelation->save();
          
          return $this->redirect(['result', 'id' => $product->id]);
        }
    }

  public function actionDeletematerial($id,$product_id){
    $material = $this->findMaterial($id);

    foreach($material->matrelations as $matrelation){
      $matrelation->delete();
    }

    $material->delete();
    
    return $this->redirect(['result', 'id' => $product_id]);
  }

  public function actionCreatematrelation(){
    $matrelation = new Matrelations();

    if ($matrelation->load(Yii::$app->request->post()) && $matrelation->validate()) {
      $matrelation->product_id = Yii::$app->request->post()["Matrelations"]["product_id"];
      $matrelation->material_id = Yii::$app->request->post()['Matrelations']['material_id'];
      $matrelation->save();
      return $this->redirect(['result', 'id' => $matrelation->product_id]);
    }
  }

  public function actionDeletematrelation($id, $product_id){
    $this->findMaterelation($id)->delete();
    return $this->redirect(['result', 'id' => $product_id]);
  }

  public function actionEditmaterial($id, $product_id){
    $this->layout = 'modal';
    $material = $this->findMaterial($id);

    if ($material->load(Yii::$app->request->post()) && $material->validate()){
        $material->title = Yii::$app->request->post()['Materials']['title'];
        $material->price = str_replace(",", ".", Yii::$app->request->post()['Materials']['price']);
        $material->save();
        return $this->redirect(['result', 'id' => $product_id]);
    } else{
      return $this->render('edit_material', ['material' => $material, 'product_id' => $product_id]);
    }
  }
    
  public function actionCreateproduct(){
    $this->layout = 'modal';
    $product = new Products;
    

        if ($product->load(Yii::$app->request->post()) && $product->validate()) {
          
          $product->title = Yii::$app->request->post()["Products"]["title"];
          $product->formula = Yii::$app->request->post()["Products"]["formula"];
          $product->save();
          
          $relation1 = new Relations;
          $relation2 = new Relations;
          $relation3 = new Relations;
          
          $relation1->product_id = $product->id;
          $relation2->product_id = $product->id;
          $relation3->product_id = $product->id;
          
          $relation1->service_id = 1;
          $relation2->service_id = 2;
          $relation3->service_id = 3;
          
          $relation1->save();
          $relation2->save();
          $relation3->save();
          
          
          return $this->redirect(['result', 'id' => $product->id]);
        }
        else{
         return $this->render('create_product', ['product' => $product]);
        }
    }
    
  public function actionEditproduct($product_id){
    $this->layout = 'modal';
    $product = $this->findProduct($product_id);
    

        if ($product->load(Yii::$app->request->post()) && $product->save()) {
          
          return $this->redirect(['result', 'id' => $product->id]);
        }
        else{
         return $this->render('create_product', ['product' => $product]);
        }
    }
    
  public function actionDeleteproduct($id){
    $product = $this->findProduct($id);
    $product_id = $product->id;
    $relations = $product->relations;
    $sizes = $product->size;
    $variants = $product->variants;
    $prices = Prices::findAll(['product_id' => $product->id]);
    
    foreach($prices as $price){
        $price->delete();
    }
    
    foreach($variants as $variant){
        $variant->delete();
    }
    
    foreach($sizes as $size){
        $size->delete();
    }
    
    foreach($relations as $relation){
        $relation->delete();
    }
    
    $product->delete();
    
        return $this->redirect(['result', 'id' => 1]); 
    }
    
  public function actionCreatevariant($product_id){
    $this->layout = 'modal';
    $product = $this->findProduct($product_id);
    $variant = new Variants();

        if ($variant->load(Yii::$app->request->post()) && $variant->validate()) {
          
          $variant->title = Yii::$app->request->post()["Variants"]["title"];
          $variant->product_id = $product->id;
          $variant->save();
          
          return $this->redirect(['result', 'id' => $variant->product_id]);
        }
        else{
         return $this->render('variant_form', ['variant' => $variant]);
        }
    }
    
  public function actionDeletevariant($id){
    $product_id = $this->findVariant($id)->product_id;
    $this->findVariant($id)->delete();
    
        return $this->redirect(['result', 'id' => $product_id]);
    }
    
  public function actionEditvariant($id){
    $this->layout = 'modal';
    $variant = $this->findVariant($id);

        if ($variant->load(Yii::$app->request->post()) && $variant->validate()) {
          
          $variant->title = Yii::$app->request->post()["Variants"]["title"];
          $variant->save();
          
          return $this->redirect(['result', 'id' => $variant->product_id]);
        }
        else{
         return $this->render('variant_form', ['variant' => $variant]);
        }
    }
  
  public function actionCreatesize($product_id){
    $this->layout = 'modal';
    $size = new Size;
    $product = $this->findProduct($product_id);
    $price = new Prices;
    $printprice = new Prices;

        if ($size->load(Yii::$app->request->post()) && $size->validate()) {
          
          $size->title = Yii::$app->request->post()["Size"]["title"];
          $size->variant_id = Yii::$app->request->post()["Size"]["variant_id"];
          $size->product_id = $product_id;
          $size->save();
          
          $price->price = str_replace(",", ".", Yii::$app->request->post()["Prices"]["price"]);
          $price->product_id = $product->id;
          $price->service_id = 2;
          $price->size_id = $size->id ;
          $price->save();
          
          $printprice->price = str_replace(",", ".", Yii::$app->request->post()["PrintPrices"]["price"]);
          $printprice->product_id = $product->id;
          $printprice->service_id = 3;
          $printprice->size_id = $size->id ;
          $printprice->save();
          
          
          
          return $this->redirect(['result', 'id' => $product->id]);
        }
        else{
         return $this->render('size_form', ['size' => $size, 'product' => $product, 'price' => $price, 'printprice' => $printprice ]);
        }
    }
    
  public function actionEditsize($id){
    $this->layout = 'modal';
    $size = $this->findSize($id);
    $product = $this->findProduct($size->product_id);
    $price = Prices::find()->where(['size_id' => $size->id, 'service_id' => 2])->one();
    $printprice = Prices::find()->where(['size_id' => $size->id, 'service_id' => 3])->one();
    
        if ($size->load(Yii::$app->request->post()) && $size->validate()) {
          
          $size->title = Yii::$app->request->post()["Size"]["title"];
          $size->save();
          
          $price->price = str_replace(",", ".", Yii::$app->request->post()["Prices"]["price"]);
          $price->save();
          
          $printprice->price = str_replace(",", ".", Yii::$app->request->post()["PrintPrices"]["price"]);
          $printprice->save();
          
          return $this->redirect(['result', 'id' => $size->product_id]);
        }
        else{
         return $this->render('size_form', ['size' => $size, 'price' => $price, 'printprice' => $printprice, 'product' => $product]);
        }
    }
    
  public function actionDeletesize($id){
    $size = $this->findSize($id);
    $product_id = $size->product_id;
    $prices = Prices::findAll(['size_id' => $size->id]);
    foreach($prices as $price){
        $price->delete();
    }
    
    $size->delete();
    
        return $this->redirect(['result', 'id' => $product_id]); 
    }
    
  public function actionCreatecolor($product_id, $size_id){
    $this->layout = 'modal';
    $color = new Colors;
    $prices = new Prices;
    $product = $this->findProduct($product_id);
    $size = $this->findSize($size_id);

        if ($color->load(Yii::$app->request->post()) && $color->validate()) {
          
          $color->title = Yii::$app->request->post()["Colors"]["title"];
          $color->size_id = $size->id;
          
          $color->save();
          $prices->price = str_replace(",", ".", Yii::$app->request->post()["Prices"]["price"]);
          $prices->color_id = $color->id;
          $prices->size_id = $size->id;
          $prices->save();
          
          
          return $this->redirect(['result', 'id' => $product_id]);
        }
        else{
         return $this->render('color_form', ['color' => $color, 'product' => $product, 'prices' => $prices]);
        }
    }
    
  public function actionEditcolor($id, $product_id){
    $this->layout = 'modal';
    $color = $this->findColor($id);
    $prices = $color->prices;

        if ($color->load(Yii::$app->request->post()) && $color->validate()) {
          
          $color->title = Yii::$app->request->post()["Colors"]["title"];
          $color->save();
          
          $prices->price = str_replace(",", ".", Yii::$app->request->post()["Prices"]["price"]);
          $prices->color_id = $color->id;
          $prices->size_id = $color->size_id;
          $prices->save();
          
          
          return $this->redirect(['result', 'id' => $product_id ]);
        }
        else{
         return $this->render('color_form', ['color' => $color, 'product_id' => $product_id, 'prices' => $prices ]);
        }
    }
    
  public function actionDeletecolor($id, $product_id){
    $color = $this->findColor($id);
    $price = $color->prices;
    
    $color->delete();
    $price->delete();
    
        return $this->redirect(['result', 'id' => $product_id]); 
    }
    
    
    
  public function actionCreateservice($product_id){
    $this->layout = 'modal';
    $service = new Services;
    $price = new Prices;
    $relation = new Relations;
    $product = $this->findProduct($product_id);

        if ($service->load(Yii::$app->request->post()) && $service->validate()) {
          
          $service->title = Yii::$app->request->post()["Services"]["title"];
          $service->unit = Yii::$app->request->post()["Services"]["unit"];
          $service->save();
          
          $price->price = str_replace(",", ".", Yii::$app->request->post()["Prices"]["price"]);
          $price->service_id = $service->id;
          $price->product_id = $product->id;
          $price->save();
          
          $relation->product_id = $product->id;
          $relation->service_id = $service->id;
          $relation->save();
          
          
          
          return $this->redirect(['result', 'id' => $product_id]);
        }
        else
        {
         return $this->render('service_form', [ 'service' => $service, 'price' => $price]);
        }
    }
    
    public function actionEditservice($id, $product_id){
    $this->layout = 'modal';
    $service = $this->findService($id);
    $price = Prices::findOne(['service_id' => $service->id]);

        if ($service->load(Yii::$app->request->post()) && $service->validate()) {
          
          $service->title = Yii::$app->request->post()["Services"]["title"];
          $service->unit = Yii::$app->request->post()["Services"]["unit"];
          $service->save();
          
          $price->price = str_replace(",", ".", Yii::$app->request->post()["Prices"]["price"]);
          $price->save();
          
          return $this->redirect(['result', 'id' => $product_id]);
        }
        else{
         return $this->render('service_form', [ 'service' => $service, 'price' => $price]);
        }
    }
    
    
    
    public function actionDeleteservice($id, $product_id){
    
    $service = $this->findService($id);
    $prices = $service->prices;
    $relations = $service->relations;
    
    $service->delete();
    
    foreach($prices as $price){
        $price->delete();
    }
    foreach($relations as $relation){
        $relation->delete();
    }
    

     
    return $this->redirect(['result', 'id' => $product_id]);
       
    }
  
  protected function findProduct($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
  protected function findVariant($id)
    {
        if (($model = Variants::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
  protected function findSize($id)
    {
        if (($model = Size::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
  protected function findColor($id)
    {
        if (($model = Colors::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
  protected function findService($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

  protected function findMaterial($id)
    {
        if (($model = Materials::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

  protected function findMaterelation($id){
    if (($model = Matrelations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
  }
}