let like = document.getElementsByClassName('like');
let unlike = document.getElementsByClassName('unlike');
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const pluralize = (val, word, plural = word + 's') => {
    const _pluralize = (num, word, plural = word + 's') =>
        [1, -1].includes(Number(num)) ? word : plural;
    if (typeof val === 'object') return (num, word) => _pluralize(num, word, val[word]);
    return _pluralize(val, word, plural);
};

function add_event_to_likes(name)
{
    let list_of_elems;
    if (name === 'like') {
        list_of_elems = like;
    } else {
        list_of_elems = unlike;
    }
    for (let i = 0; i < list_of_elems.length; i++) {
        list_of_elems[i].addEventListener('click', (e) => {
            let target = e.target.dataset.id;
            let like_number = document.getElementsByClassName(`total${target}`)[0];
            fetch(`/quote/${name}/${target}/`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'post',
                credentials: "same-origin",
            })
                .then(() => {
                if (name === 'like') {
                    document.getElementById(`like${target}`).classList.add('hidden');
                    document.getElementById(`unlike${target}`).classList.remove('hidden');
                    like_number.innerHTML = parseInt(like_number.innerHTML) + 1;
                }
                else {
                    document.getElementById(`like${target}`).classList.remove('hidden');
                    document.getElementById(`unlike${target}`).classList.add('hidden');
                    like_number.innerHTML = parseInt(like_number.innerHTML) - 1;
                }
                let likes_text = document.getElementById(`total_likes_text${target}`);
                console.log(likes_text);
                likes_text.innerHTML = pluralize(parseInt(like_number.innerHTML), 'Like');
            })
            .catch(function (error) {
                console.log(error);
            })
        });
    }
}

add_event_to_likes('like');
add_event_to_likes('unlike');
