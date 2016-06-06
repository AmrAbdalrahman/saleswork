<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface as ProductInterface;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    //
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }
    
    public function index (){
        return view('product.addproduct');
    }
    public function store (Requests\ProductRequest $productRequest,Product $product){
        $this->product->addproduct($productRequest,$product);
        return redirect()->back()->with('flash_message','Product has added successfully');
    }
   public function showAllProducts(Product $product) {
       $productAll = $this->product->showAllProducts($product);
       return view('welcome', compact('productAll'));
    }
    public function productediting($id,Product $product){
        $productInfo = $this->product->editproduct($id,$product);
        return view('product.editproduct',  compact('productInfo'));
    }
    public function updatingproduct($id,Requests\ProductRequest $request){

        $this->product->userUpdateProduct($id,$request);
        return redirect()->back()->with('flash_message','Product Editing has done successfully');
    }
    public function showingproduct($id,Product $product){
        $ProductInfo = $this->product->showproduct($id,$product);
        return view('product.viewproduct', compact('ProductInfo'));
    }
    public function deletingproduct ($id){
        $this->product->destroy($id);
        return redirect()->back()->with('flash_message','Product  has deleted successfully');

    }
}
