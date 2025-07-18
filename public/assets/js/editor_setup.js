const editors = document.querySelectorAll("textarea.text-editor")
editors.forEach(editor => {
    ClassicEditor
            .create( editor,{
                fontColor: {
                    colors: [
                        {
                        color: '#BD3124',
                        label: 'Rouge'
                        },
                        {
                        color: '#F6DADE',
                        label: 'Rouge clair'
                        },
                        {
                        color: '#4F4F4F',
                        label: 'Gris'
                        },
                    ]
                }
            })
            .catch( error => {
                console.error( error );
            } );
})