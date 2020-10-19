import { Converter } from 'showdown';

export module MarkdownEngine {
    var converter = new Converter();
    function convertText(toConvert: string) {
        return converter.makeHtml(toConvert);
    }

    export function convertList(toConvert: HTMLCollectionOf<Element>): Array<string> {
        var retval: Array<string> = [];
        var i:number;
        for(i = 0; i < toConvert.length; i++) {
            var current: Element = toConvert.item(i);
            var tmp = convertText(current.innerHTML.trim());
            retval.push(tmp);
        }
        return retval;
        
    }
}