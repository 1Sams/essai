
@extends('base')


@section('title', 'Acceuil de mon blog')



  @section('content')
    <h1>mon blog</h1>
        @foreach ($posts as $posts )
            <article>
                <h1>{{ $posts->title }}</h1>
                <p>
                    {{ $posts->content }}
                </p>
                <p>
                    <a href="{{ route('blog.show', ['slug'=>$posts->slug, 'post'=> $posts->id]) }}" class="btn btn-primary">Lire la suite</a>
                </p>


            </article>
        @endforeach
                {{ $posts->links }}



@endsection
