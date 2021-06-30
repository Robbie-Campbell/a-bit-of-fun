let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function add_event_to_likes(name)
{
    let like = document.getElementsByClassName('like');
    let unlike = document.getElementsByClassName('unlike');
    let list_of_elems;
    if (name === 'Like') {
        list_of_elems = like;
    } else {
        list_of_elems = unlike;
    }
    for (let i = 0; i < list_of_elems.length; i++) {
        list_of_elems[i].addEventListener('click', (e) => {
            let like_number = document.getElementsByClassName(`total${e.target.dataset.id}`)[0];
            let text_content = document.getElementsByClassName(`text${e.target.dataset.id}`)[0];
            console.log(like_number.innerHTML);
            fetch(`/quote/${name}/${e.target.dataset.id}/`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'post',
                credentials: "same-origin",
            })
                .then(() => {
                if (name === 'like') {
                    like_number.innerHTML = parseInt(like_number.innerHTML) + 1;
                    text_content.innerHTML = "Unlike";
                    list_of_elems[i].classList.remove('like');
                    list_of_elems[i].classList.add('unlike');
                }
                else {
                    like_number.innerHTML = parseInt(like_number.innerHTML) - 1;
                    text_content.innerHTML = "Like";
                    list_of_elems[i].classList.remove('unlike');
                    list_of_elems[i].classList.add('like');
                }
            })
            .catch(function (error) {
                console.log(error);
            })
        });
    }
}

add_event_to_likes(like, 'like');
add_event_to_likes(unlike, 'unlike');
