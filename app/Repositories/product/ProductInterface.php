<?php


namespace App\Repositories\Product;
use App\Http\Requests;
use App\Product;

interface ProductInterface {
    
    public function index();
    public function addproduct($productRequest,$product);
    public function showAllProducts($product);
    
    public function editproduct($id,$product);
    public function userUpdateProduct($id,$request);

    public function showproduct($id,$product);
    
    public function destroy($id);


    

}