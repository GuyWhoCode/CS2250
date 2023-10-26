// https://jsonplaceholder.typicode.com/guide/

async function downloadPosts(page = 1) {
    const postsURL = `https://jsonplaceholder.typicode.com/posts?_page=${page}`;
    const response = await fetch(postsURL);
    const articles = await response.json();
    return articles;
}

async function downloadComments(postId) {
    const commentsURL = `https://jsonplaceholder.typicode.com/posts/${postId}/comments`;
    const response = await fetch(commentsURL);
    const comments = await response.json();
    return comments;
}

async function getUserName(userId) {
    const userURL = `https://jsonplaceholder.typicode.com/users/${userId}`;
    const response = await fetch(userURL);
    const user = await response.json();
    return user.name;
}

function getArticleId(comments) {
    const article = comments.previousElementSibling;
    const data = article.dataset;
    return data.postId;
}

async function createPost(post) {
    const article = document.createElement("article");
    article.setAttribute("data-post-id", post.id);

    const title = document.createElement("h2");
    title.innerText = post.title;
    article.appendChild(title);

    const authorContainer = document.createElement("aside");
    authorContainer.innerHTML = `by <span> ${await getUserName(
        post.userId
    )}</span>`;
    article.appendChild(authorContainer);

    const articleBody = document.createElement("p");
    post.body = post.body.replaceAll("\n", "<br/>");
    articleBody.innerHTML = post.body;
    article.appendChild(articleBody);

    return article;
}

function createCommentContainer() {
    const dropdownContainer = document.createElement("details");
    const commentSummary = document.createElement("summary");
    commentSummary.innerText = "See what our readers had to say...";
    dropdownContainer.appendChild(commentSummary);

    const commentContainer = document.createElement("section");
    dropdownContainer.appendChild(commentContainer);
    const header = document.createElement("header");
    const headerText = document.createElement("h3");
    headerText.innerText = "Comments";
    header.appendChild(headerText);
    commentContainer.appendChild(header);

    return dropdownContainer;
}

function renderComment(comment) {
    const container = document.createElement("aside");
    const content = document.createElement("p");
    comment.body = comment.body.replaceAll("\n", "<br/>");
    content.innerHTML = comment.body;
    container.appendChild(content);

    const author = document.createElement("p");
    author.innerHTML = `<small>${comment.name}</small>`;
    container.appendChild(author);

    return container;
}

const posts = await downloadPosts();
console.log(posts);
for (const post of posts) {
    const article = await createPost(post);
    const main = document.querySelector("main");
    main.appendChild(article);

    const comments = createCommentContainer();
    main.appendChild(comments);
}

const details = document.getElementsByTagName("details");
for (const detail of details) {
    detail.addEventListener("toggle", async () => {
        if (detail.open) {
            const asides = detail.getElementsByTagName("aside");
            const commentsWereDownloaded = asides.length > 0;
            if (!commentsWereDownloaded) {
                const articleId = getArticleId(detail);
                const comments = await downloadComments(articleId);
                for (const comment of comments) {
                    const commentContainer = renderComment(comment);
                    detail.lastChild.appendChild(commentContainer);
                    // targets the section element to properly render individual comments
                }
            }
        }
    });
}
