@props(['title','content','id','thumblain'])
    <div class="card" style="width: 18rem;">
  <img height="190px" width="290px" src="/storage/{{ $thumblain ?
   "$thumblain"
   : "thumblains/placeholder.png" 
  }}" class="card-img-top object-fit-cover" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $title }}</h5>
    <p class="card-text">{{ $content }}</p>
     <div class="d-flex align-items-center justify-content-center gap-2">
    <a href="/edit/{{ $id }}" class="btn btn-info w-100">Edit</a>
    <form action="/note/delete/{{ $id }}" method="POST" class="w-100">
        @csrf
        @method("delete")
       
            
            <button class="btn btn-danger w-100">Delete</button>
        
    </form>
    </div>
  </div>
</div>