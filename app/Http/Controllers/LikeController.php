<?php
namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Single;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeSong(Request $request)
    {
        $singleId = $request->input('single_id');
        $userId = auth()->id(); // Assurez-vous que l'utilisateur est authentifié

        // Vérifiez si l'utilisateur a déjà liké la chanson
        $existingLike = Like::where('single_id', $singleId)->where('user_id', $userId)->first();

        if ($existingLike) {
            // Si l'utilisateur a déjà liké, vous pouvez choisir de supprimer le like (toggle)
            $existingLike->delete();
            return response()->json(['success' => true, 'liked' => false]);
        } else {
            // Sinon, créez un nouveau like
            Like::create(['single_id' => $singleId, 'user_id' => $userId]);
            return response()->json(['success' => true, 'liked' => true]);
        }
    }

}
