<?php

namespace App\Repositories\Product;

use App\Repositories\Product\ProductInterface as ProductInterface;
use App\Product;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductInterface
{
    public $product;

    function __construct(Product $product) {
        $this->product = $product;
    }

    public function index()
    {

    }
    public function addproduct($productRequest,$product)
    {
        if($productRequest->file('product_images')) {
            $filename = uploadImages($productRequest->file('product_images'));
            if (!$filename) {
                return redirect()->back()->with('flash_message', 'please choose another image less than 500*362');
            }
            $image = $filename;

            //    }
        }  else {
            $image = '';
        }

        $user = Auth::user() ? Auth::user()->id : 0 ;
       // dd($user);
        $data= [
            'product_name' => $productRequest->product_name,
            'product_des' => $productRequest->product_des,
            'user_id' => $user,
            'product_images' => $image

        ];
        $product->create($data);
    }

    public function showAllProducts($product)
    {
        $user = Auth::user() ? Auth::user()->id : 0 ;
        if($user!= 0){
            return $productAll = $product->where('user_id',$user)->orderBy('id','desc')->paginate(9);
        }
        else{
            return $productAll = $product->orderBy('id','desc')->paginate(9);
        }

    }

    public function editproduct($id,$product)
    {
        return $product->find($id);
    }

    public function userUpdateProduct($id,$request){

        $buupdate =  Product::find($id);
        $buupdate->fill(array_except($request->all(),['product_images']))->save();
        if($request->file('product_images')){
            $filename = uploadImages($request->file('product_images'));
            if(!$filename){
                return redirect()->back()->with('flash_message','please choose another image less than 500*362');
            }
            $buupdate->fill(['product_images' => $filename])->save();
        }

    }

    public function showproduct($id,$product){
        return $product->findOrFail($id);
    }

    public function destroy($id){
        Product::find($id)->delete();
        
    }

}