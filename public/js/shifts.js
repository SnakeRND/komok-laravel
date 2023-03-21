const programInput = document.getElementById('program-input')
const programs = document.getElementsByClassName('program-link')
const tabs = document.getElementsByClassName('side-tabs')

programInput.value = cutHtmlTags(document.getElementById('program-name').innerHTML)

for (let i = 0 ; i < programs.length; i++) {
    programs[i].addEventListener('click' , function () {
        programInput.value = cutHtmlTags(programs[i].innerHTML)
    })
}

for (let i = 0 ; i < tabs.length; i++) {
    tabs[i].addEventListener('click' , function () {
        let link = tabs[i].querySelector('a')
        let programLinkId = link.id.replace(/[^+\d]/g, '')
        let programLink = document.getElementById(programLinkId)

        programInput.value = cutHtmlTags(programLink.innerHTML)
    })
}

function cutHtmlTags(str) {
    const regex = /(|<([^>]+)>)/ig;
    return str.replace(regex, "");
}
