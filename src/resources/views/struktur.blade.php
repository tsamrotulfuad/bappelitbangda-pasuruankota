@extends('welcome')

@push('scripts')
<script src="https://d3js.org/d3.v7.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/d3-org-chart@3.0.1"></script>
<script src="https://cdn.jsdelivr.net/npm/d3-flextree@2.1.2/build/d3-flextree.js"></script>
@endpush

@section('content')
<div class="mt-3">
    <div class="chart-container"></div>
</div>

<script>
  fetch(
    'http://localhost:8080/api/struktur'
  )
    .then((d) => d.json())
    .then((data) => {
      console.log({ data });
      new d3.OrgChart()
        .nodeWidth((node) => 200)
        .nodeHeight((node) => 180)
        .nodeContent((node) => {
            return `<div 
                style="background-color:black;width:${node.width}px;height:${node.height}px;text-align:center;"> 
                ${node.data.name} : <br>${node.data.deskripsi} <br>
            </div>`
        })
        .container('.chart-container')
        .data(data)
        .render();
    });
</script>
@endsection