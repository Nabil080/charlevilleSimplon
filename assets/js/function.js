function swapDivsById(id1,id2){
    div1 = document.getElementById(id1)
    div2 = document.getElementById(id2)

    // console.log(div1)
    // console.log(div2)

    if(div1.style.display === 'none'){
        div1.style.display = 'block'
        div2.style.display = 'none'
    }else{
        div1.style.display = 'none'
        div2.style.display = 'block'
    }
}