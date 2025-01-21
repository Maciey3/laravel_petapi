<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    public function index(Request $request){
        // dd($pet_id);
        // dump($request);
        if($request->pet_id){
            $id = $request->pet_id;

            $response = Http::withHeaders([
                'accept' => 'application/json'])
                ->get("https://petstore.swagger.io/v2/pet/$id");
            
            $response_json = $response->ok() ? json_decode($response->body()) : Null;
            
            $status = $response->status();

            if($status == 200){
                $response = "Succesfully found a pet with id = $id";
            }
            else if($status == 400){
                $response = "There was a problem with pet with id = $id (Invalid ID supplied)";
            }
            else if($status == 404){
                $response = "There was a problem with pet with id = $id (Pet not found)";
            }
            else if($response_status == 500){
                $response = 'There was a problem with creating a pet (Server Error)';
            }
        } 
        return view('index', ['search' => $response_json ?? Null, 'response' => $response ?? Null]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $id = $request->id;
        $name = $request->name;
        $category_id = $request->category_id;
        $category_name = $request->category_name;
        $status = $request->status;
        $json = json_encode([
            'id' => $id,
            'category' => ['id' => $category_id, 'name' => $category_name],
            'name' => $name,
            'status' => "available"
        ]);

        $response = Http::withHeaders([
            'content-Type' => 'application/json',
            'accept' => 'application/json'])
            ->post("https://petstore.swagger.io/v2/pet", json_decode($json));

        $response_status = $response->status();

        
        if($response_status == 200){
            $response = 'Succesfully created a pet';
        }
        else if($response_status == 405){
            $response = 'There was a problem with creating a pet (Invalid input)';
        }
        else if($response_status == 500){
            $response = 'There was a problem with creating a pet (Server Error)';
        }

        return view('create', ['response' => $response]);
    }

    public function edit(){
        return view('edit');
    }

    public function update(Request $request){
        $id = $request->id;
        $name = $request->name;
        $category_id = $request->category_id;
        $category_name = $request->category_name;
        $status = $request->status;
        $json = json_encode([
            'id' => $id,
            'category' => ['id' => $category_id, 'name' => $category_name],
            'name' => $name,
            'status' => "available"
        ]);

        $response = Http::withHeaders([
            'content-Type' => 'application/json',
            'accept' => 'application/json'])
            ->put("https://petstore.swagger.io/v2/pet", json_decode($json));

        $response_status = $response->status();
        
        if($response_status == 200){
            $response = "Succesfully eddited a pet with id = $id";
        }
        else if($response_status == 400){
            $response = "There was a problem editing a pet with id = $id (Invalid ID supplied)";
        }
        else if($response_status == 404){
            $response = "There was a problem editing a pet with id = $id (Pet not found)";
        }
        else if($response_status == 405){
            $response = "There was a problem editing a pet with id = $id (Validation exception)";
        }
        else if($response_status == 500){
            $response = 'There was a problem with creating a pet (Server Error)';
        }

        return view('edit', ['response' => $response]);
    }

    public function delete(){
        return view('delete');
    }

    public function destroy(Request $request){
        $id = $request->id;

        $response = Http::withHeaders([
            'content-Type' => 'application/json',
            'accept' => 'application/json'])
            ->delete("https://petstore.swagger.io/v2/pet/$id");

        $response_status = $response->status();
        
        if($response_status == 200){
            $response = "Succesfully deleted a pet with id = $id";
        }
        else if($response_status == 400){
            $response = "There was a problem deleting a pet with id = $id (Invalid ID supplied)";
        }
        else if($response_status == 404){
            $response = "There was a problem deleting a pet with id = $id (Pet not found)";
        }
        else if($response_status == 500){
            $response = 'There was a problem with creating a pet (Server Error)';
        }

        return view('delete', ['response' => $response]);
    }

}
