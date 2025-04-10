

class CKEditorLoader
{
    Embed(){
        new MyEmbed();
    }
}

class MyEmbed
{
    constructor(){

        const oembeds = document.querySelectorAll('oembed[url]');

        for(var i = 0; i < oembeds.length; i++){

            let oembedUrl = oembeds[i].getAttribute('url');

            let iframe = this.Youtube(oembedUrl);

            oembeds[i].parentElement.outerHTML = iframe;
        }
    }

    Youtube(url)
    {
        const youtubeId = this.GetYoutubeId(url);

        if(youtubeId != undefined && youtubeId != ""){
            const iframe = `<iframe src="https://www.youtube.com/embed/` + youtubeId + `"></iframe>`;
            return iframe;
        }

        return null;
    }

    GetParam(url, param)
    {
        let match = RegExp('[?&]' + param + '=([^&]*)').exec(url);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }

    GetYoutubeId(url)
    {
        if(url.indexOf("youtu.be") != -1){
            const urlArray = url.split("youtu.be/");
            return urlArray[1];
        }

        return this.GetParam(url, "v");
    }
}

export default CKEditorLoader;
