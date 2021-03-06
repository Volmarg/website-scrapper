class TextExtInvoker {
    constructor() {

    }

    isMoreThanOne(element) {
        return ($(element).next().children().length ? false : true);
    }

    attachTextExtToInputs() {
        let helpers = new TextExtInvoker();

        $('#acceptKeywordsBody').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add one...',
        });

        $('#acceptKeywordsOther').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add one...',
        });

        $('#rejectKeywordsBody').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add one...',
        });

        $('#rejectKeywordsOther').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add one...',
        });

        $('#links').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        });

        $('#pagination_links').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        });


        //one elem limited inputs
        $('#querySelectorMain').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#querySelectorOther').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#Pagination').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#contentLength').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#startPage').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#endPage').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#pageIterator').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })

        $('#subpagesLinkExtractionPattern').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })


        $('#pagesPattern').textext({
            plugins: 'tags prompt focus autocomplete',
            prompt: 'Add link...',
        }).bind('isTagAllowed', helpers, function (e, data) {
            data.result = helpers.isMoreThanOne(this);
        })
    }


}