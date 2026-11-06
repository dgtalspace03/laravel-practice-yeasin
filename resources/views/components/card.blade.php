@props(['title','content'])
    <div class="card" style="width: 18rem;">
  <img src="https://camo.githubusercontent.com/5e45bc648dba68520ce949a53690af6bcef2880f84a1d46cbb1636649afd6d84/68747470733a2f2f796176757a63656c696b65722e6769746875622e696f2f73616d706c652d696d616765732f696d6167652d313032312e6a7067" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $title }}</h5>
    <p class="card-text">{{ $content }}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>