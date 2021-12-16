const nbDays = document.getElementById('nbDays');
const listDomains = document.getElementById('listDomains');
const btnComment = document.querySelectorAll('.displayComment')

    btnComment.forEach((comment) => {
    comment.addEventListener("click", (event) => {
        const displayComment = document.getElementById('comment'+event.currentTarget.name)
        const comment = document.querySelectorAll('.opinionComment')
        comment.forEach(x => {
            if(x === displayComment){
                if (displayComment.classList.contains('hidden')) {
                    displayComment.classList.remove('hidden')

                } else {
                    displayComment.classList.add('hidden');
                }
            }else{
                x.classList.add('hidden')
            }
        }
        )
    })
})

document.addEventListener('change', function (e) {
    if (e.target === nbDays) {
        let last = window.location.href.split('/').slice(-1)
        let url = window.location.href.split('/').slice(0, -1)
        if (last == 'days') {
            url.push('days', nbDays.value)
        } else {
            url.push(nbDays.value)
        }

        window.location.replace(url.join('/'));

    } else if (e.target === listDomains) {
        let last = window.location.href.split('/').slice(-1)
        let url = window.location.href.split('/').slice(0, -1)
        if (listDomains.value !== 'TOU') {
            if (last == 'domains') {
                url.push('domains', listDomains.value)
            } else {
                url.push(listDomains.value)
            }
        }
        window.location.replace(url.join('/'));
    }
})


require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

