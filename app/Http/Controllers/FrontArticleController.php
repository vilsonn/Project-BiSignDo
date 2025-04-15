<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FrontArticleController extends Controller
{
    /**
     * Menampilkan halaman artikel dengan sidebar.
     * Bisa menampilkan artikel pertama secara default 
     * atau menampilkan halaman kosong di konten utama.
     */
    public function index()
    {
        // Ambil semua artikel untuk sidebar
        $articles = Article::orderBy('title')->get(); 
        // Opsi 1: Tampilkan artikel pertama
        $selectedArticle = null;

        if ($articles->count() > 0) {
            // Ambil artikel pertama sebagai konten default
            $selectedArticle = $articles->first();
        }

        return view('articles.index', compact('articles', 'selectedArticle'));
    }

    /**
     * Menampilkan artikel tertentu.
     */
    public function show($id)
    {
        // Ambil semua artikel untuk sidebar
        $articles = Article::orderBy('title')->get();

        // Ambil artikel dengan ID
        $selectedArticle = Article::findOrFail($id);

        return view('articles.index', compact('articles', 'selectedArticle'));
    }
}