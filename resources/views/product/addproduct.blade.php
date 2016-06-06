@extends('layouts.app')


@section('title')

    Add Product

    @endsection

@section('content')


    <style>

        .df{
            margin-bottom: 25px;
        }
        .dt{
            margin-top: 25px;
        }

    </style>


    {!!  Form::open(['url'=>'/addproduct/','method'=>'post','files' => true])!!}



    {!! csrf_field() !!}

    <div class="{{ $errors->has('product_name') ? ' has-error' : '' }} ">

        <div class="col-md-3">
            <label>

                Product Name:

            </label>
        </div>


        <div class="col-md-9 pull-left">
            {!! Form::text("product_name",null,['class'=>'form-control df','placeholder' => 'Enter Product Name']) !!}
        </div>


    </div>
    <br>
    <br>

    <div class="{{ $errors->has('product_des') ? ' has-error' : '' }}">

        <div class="col-md-3">
            <label>

                Product Description:

            </label>
        </div>


        <div class="col-md-9">
            {!! Form::textarea("product_des",null,['class'=>'form-control df','placeholder' => 'Enter product description']) !!}
        </div>


    </div>

    <br>
    <br>
    <br>
    <br>


    <div class="{{ $errors->has('product_images') ? ' has-error' : '' }} " >

        <div class="col-md-3">
            <label>

                Product Main Image
            </label>
        </div>


        <div class="col-md-9">
            {!! Form::file("product_images",null,['class'=>'form-control ']) !!}
        </div>


    </div>


    <br>
    <br>


    <div class="pull-left">
        <div class="col-md-6">
            <button  type="submit" class="btn btn-warning dt">
                <i class="fa fa-btn fa-user"></i>Done
            </button>
        </div>
    </div>
    {!! Form::close() !!}

@endsection