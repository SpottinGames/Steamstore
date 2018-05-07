@extends('layouts.app')

@section('content')
<h1>Voeg een nieuwe game toe</h1>

<div class="container">
  <h1>Games</h1>
  @if ($errors->any())
       <div class=“alert alert-danger”>
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
             </ul> </div>
  @endif
  <form method="POST" class="form_container" enctype="multipart/form-data">

        <div class="form-group">
          <label for="name"></label>
          <input type="text" class="form-control" id="name" placeholder="Game name" name="name">
        </div>

        <div class="form-group">
          <input type="file" name="images[]" multiple="multiple">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"/></textarea>
        </div>

        <div class="form-group">
                <label for="price">Prijs</label>
              <input type="number" name="price" id="price"/>
        </div>

        <div class="form-group">
            <label for="status">
            <input class="form-check-input" type="checkbox" value="1" name="available" checked>Active
          </label>
        </div>

        <div class="form-group">
            <label for="highlighted">
            <input class="form-check-input" type="checkbox" value="1" name="highlighted" checked>Highlighted
          </label>
        </div>

        {{ csrf_field() }}

        <input type="submit" name="submit" class="btn btn-success" value="Opslaan">
    </form>
</div>
@endsection
