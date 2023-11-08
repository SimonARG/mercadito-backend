<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Pipes\Posts\ByUser;
use App\Pipes\Posts\ByTitle;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Pipes\Posts\ByCategory;
use Illuminate\Pipeline\Pipeline;
use App\Http\Controllers\Api\ApiController;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::query();

        if (request('title')) {
            $title = request('title');
        }
        if (request('category')) {
            $category = Category::find(request('category'))->name;
        }
        if (request('user')) {
            $user = User::find(request('user'))->name;
        }

        $pipes = [
            ByTitle::class,
            ByCategory::class,
            ByUser::class,
        ];

        // Filter records
        $posts = 
            app(Pipeline::class)
                ->send($post)
                ->through($pipes)
                ->thenReturn()
                ->latest()
                ->paginate(25);

        // Generate message
        $message = 'Displaying ' . (request('title') ? "search results for: '" . $title . "'" : 'all posts') . (request('category') ? ' in category: ' . $category : '') . (request('user') > 0 ? ' by user ' . $user : '');

        return $this->successResponse($posts, $message);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Product::create($request->all());

        if(!$result)
            return $this->errorResponse('Hubo un error al crear tu post, intentalo de nuevo');

        return $this->successResponse($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Post::find($id);

        if(!$result)
            return $this->errorResponse('Post no encontrado');

        return $this->successResponse($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $title = Post::find($id)->title;

        $result = Post::destroy($id);

        if(!$result)
            return $this->errorResponse('No se encontró el post');

        $message = 'El post: ' . "'" . $title . "'" . ' ha sido eliminado';

        return $this->successResponse($result, $message);
    }
}
