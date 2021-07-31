function renderNews(news, content) {
    content.innerHTML = '';
    news.forEach(function(article) {
        content.innerHTML += `
            <div class="col">
              <div class="card h-100">
                <img src="${ article.urlToImage ? article.urlToImage : "/placeholder.png" }" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-truncate-title">${article.title}</h5>
                  <p class="card-text text-truncate-content text-muted">${ article.description ? article.description : "No tenemos una descripción para ti, lo sentimos :(" }</p>
                </div>
                <div class="card-footer bg-white">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                      <small class="text-black-50">
                        <a class="text-decoration-none text-danger" href="${article.url}" target="_blank">${article.source.name}</a> - ${article.author.name.first} ${article.author.name.last}
                      </small>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            `
    });
}

async function getNewsQuery(params = {}) {
    try {
        let response = await axios.get(`/api/news`, {
            params
        });
        return response.data;
    } catch (error) {
        return {articles: []}
    }
}
