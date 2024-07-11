
@extends('base')


@section('title', 'Créer un article ')



  @section('content')
 <form action="" method="POST">
    @csrf
    <div>
    <input type="text" name="title" value="{{ old('title','article de démonstration ')}}">
        @error("title")
        {{ message }}
        @enderror
</div>
<div>
    <label for="slug"></label>
    <input type="text" id="slug" name="slug" value="{{ old('slug', 'slug de démonstration ') }}">
    @error("slug")
    {{ $message }}
    @enderror
    </div>
    <div><textarea name="content" >{{ old('content','contenu de démonstration ')}} </textarea>
        @error("content")
        {{ message }}
        @enderror</div>
    <button>Enregistrer</button>
 </form>


@endsection
