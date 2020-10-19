import { MarkdownEngine } from './markdownengine';

function loadArticles(ev: Event) {
    //load all elements
    console.log('loading markdown');

    var elements: HTMLCollectionOf<Element> = document.getElementsByClassName('arttext');
    var convertedElements: Array<string> = MarkdownEngine.convertList(elements);
    var i:number;
    for(i = 0; i < elements.length; i++) {
        var current: Element = elements.item(i);
        current.innerHTML = convertedElements[i];
    }
}

function commentclick(this: Element, ev: MouseEvent) {
    console.log('Er werd op de commentaar geklikt');
}

window.addEventListener('load', (ev: Event) =>  {
    console.log("document loaded");
    var commentElement = document.getElementById('commentinput');
    commentElement.addEventListener("click", commentclick);
});
window.addEventListener('load', loadArticles);
