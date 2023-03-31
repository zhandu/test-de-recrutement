const articleList = []; // In a real app this list would be full of articles.
const maxKudosPerArticle = 5; // use const

function calculateTotalKudos(articles) {
  return articles.reduce((acc, article) => acc + article.kudos, 0); // replace by a reduce function
}

document.write(`
  <p>Maximum kudos you can give to an article: ${maxKudosPerArticle}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);
