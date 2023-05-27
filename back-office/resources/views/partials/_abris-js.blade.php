<script>
    (()=> {
        const typeAbris$ = document.getElementById('type_Abris')
        const infoTypeAbris$ = document.getElementById('info-type_Abris')
    
        const setClass = (elem) => {
            if (elem?.value === 'refuge') {
                infoTypeAbris$.classList.remove('d-none')
            } else {
                infoTypeAbris$.classList.add('d-none')
            }
        }
    
        typeAbris$.addEventListener('change', (event) => {
            setClass(event?.target)
        })
        setClass(typeAbris$)
    })()
</script>