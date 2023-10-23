<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    
    public function create()
    {
        return view('reviews.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'id_sample' => 'required',
            'nb_etoiles' => 'required',
            'commentaire' => 'required',
            'identifiant' => 'required',
            'efface' => 'required',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index');
    }

   
    public function show($id)
    {
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }

    
    public function edit($id)
    {
        $review = Review::find($id);
        return view('reviews.edit', compact('review'));
    }

    
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        $request->validate([
            'id_sample' => 'required',
            'nb_etoiles' => 'required',
            'commentaire' => 'required',
            'identifiant' => 'required',
            'efface' => 'required',
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index');
    }

    
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('reviews.index');
    }
}

