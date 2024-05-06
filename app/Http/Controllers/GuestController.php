<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('guest.statistik');
    }

    public function list(){
        $books = [
            [
                'title' => 'Book 1',
                'author' => 'Author 1',
                'publisher' => 'Publisher 1',
                'year' => '2020',
                'category' => 'Category 1'
            ],
            [
                'title' => 'Book 2',
                'author' => 'Author 2',
                'publisher' => 'Publisher 2',
                'year' => '2019',
                'category' => 'Category 2'
            ],
            // Add more books as needed
        ];
        
        return view('books.index', ['books' => $books]);
        return view('guest.listbook');
    }

    public function main(){
        return view('main');
    }
}
