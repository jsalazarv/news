@extends('/layouts.main')

@push('styles')
    <link rel="stylesheet" href="assets/css/home.css">
@endpush

@section('content')
<section class="container">
    <div class="col-12 col-md-6 offset-md-3">
        <div class="input-group">
            <button class="input-group-text bg-white" id="search-button">O</button>
            <input type="text" class="form-control" id="search-input" autocomplete="off">
        </div>
    </div>
    <div id="content" class="row row-cols-1 row-cols-md-3 g-4 mx-1 my-3"></div>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection

@push('scripts')
    <script src="assets/js/fetch.js"></script>
    <script>
        window.addEventListener("load", async function (){
            let content = document.querySelector('#content');
            let searchButton = document.querySelector('#search-button');
            let searchInput = document.querySelector('#search-input');

            async function fetchAndRenderNews() {
                let userQueryParams = {};
                userQueryParams.q = searchInput.value;
                let news = await getNewsQuery(userQueryParams);

                renderNews(news.articles, content);
            }

            await fetchAndRenderNews();

            searchInput.addEventListener('keyup', function (event) {
               if(event.keyCode === 13) {
                   fetchAndRenderNews();
                   searchInput.value = "";
               }
            });

            searchButton.addEventListener('click', function () {
                fetchAndRenderNews();
                searchInput.value = "";
            });
        });
    </script>
@endpush
