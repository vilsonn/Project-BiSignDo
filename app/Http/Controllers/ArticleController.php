<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        // Pastikan penamaan view sesuai dengan penempatan Anda
        // Kita asumsikan: resources/views/admin/article/createArticle.blade.php
        return view('admin.article.createArticle');
    }

    /**
     * Menyimpan artikel baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'     => 'required|string|max:255',
            'link'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Simpan ke DB
        Article::create([
            'title'     => $request->title,
            'link'      => $request->link,
            'deskripsi' => $request->deskripsi,
        ]);

        // Kembalikan ke form (atau ke halaman lain) dengan pesan sukses
        return redirect()
            ->route('article.create')
            ->with('success', 'Artikel berhasil dibuat!');
    }
    public function index()
    {
        // Ambil semua data artikel
        $articles = Article::latest()->get();
        // Lempar ke view 'indexArticle'
        return view('admin.article.indexArticle', compact('articles'));
    }

    /**
     * 2. Menampilkan form edit untuk artikel tertentu.
     */
    public function edit($id)
    {
        // Cari artikel berdasarkan ID
        $article = Article::findOrFail($id);
        // Tampilkan view edit
        return view('admin.article.editArticle', compact('article'));
    }

    /**
     * 3. Memperbarui data artikel di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title'     => 'required|string|max:255',
            'link'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Cari artikel lalu update
        $article = Article::findOrFail($id);
        $article->update([
            'title'     => $request->title,
            'link'      => $request->link,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect kembali ke daftar artikel dengan pesan sukses
        return redirect()
            ->route('article.index')
            ->with('success', 'Artikel berhasil diupdate!');
    }

    /**
     * 4. Menghapus artikel dari database.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()
            ->route('article.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}