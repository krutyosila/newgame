let cards = {
    list: {
        favorites: [],
        mines: [],
        sold: [],
        latest: [],
        bayonet: [],
    },
    color(n) {
        let color = 'mor';
        if (n < 126) {
            color = 'sari';
        }
        if (n < 101) {
            color = 'kirmizi';
        }
        if (n < 76) {
            color = 'mavi';
        }
        if (n < 51) {
            color = 'yesil';
        }
        if (n < 26) {
            color = 'turuncu';
        }
        return color;
    },
    template(n) {
        let h = '';
        let isFav = cards.list.favorites.includes(n) ? 'unfav-button' : 'fav-button';
        let isSold = cards.list.sold.includes(n) ? 'sold' : (cards.list.bayonet.includes(n) ? 'sold' : '');
        let isMine = cards.list.mines.hasOwnProperty(n) ? 'yesil' : '';
        let amount = (isMine !== '') ? `<span class="card-value">₺${cards.list.mines[n].amount}</span>` : '';
        h += `
                <li id="cards-buyable_${n}" class="card_all card_${cards.color(n)}">
                    <div class="card ${cards.color(n)}">
                        <label class="number-caption">
                            <span class="hidden-xs">Kart No :</span><b>${n}</b> ${amount}
                        </label>
                        <span class="fav ${isFav}" rel="favorite" data-card-id="${n}"></span>
                        <ul class="number-list">
                `;
        $.each(cardList[n], function (k, v) {
            h += '<li>' + ((v && v > 0) ? `<span class="number" data-number="${v}">${v}</span>` : '<span class="space "></span>') + '</li>';
        });
        if (game.data.state === 'bet') {
            h += `<div class="buy-card ${isSold} ${cards.color(n)}" id="card-${auth.owner}-${n}">`;
            if (isSold !== '') {
                h += `<span class="btn ${isMine}">${(isMine === '') ? 'BAŞKASI ALDI' : 'ALDINIZ'}</span>`;
            } else {
                $.each(game.rooms, function (k, v) {
                    h += `<span data-card-id="${n}" data-table-id="${v.id}" class="btn buy-button narrow">${v.amount}</span>`;
                });
            }
            h += `</div>`;
        }
        h += `
                        </ul>
                    </div>
                </li>
                `;
        return h;
    },
    theme: {
        all() {
            let h = '';
            $.each(cardList, function (k, v) {
                if (v) {
                    h += cards.template(k);
                }
            });
            return h;
        },
        mines() {
            let h = '';
            $.each(cards.list.mines, function (k, v) {
                h += cards.template(k);
            });
            return h;
        },
        latest() {
            let h = '';
            $.each(cards.list.latest, function (k, v) {
                h += cards.template(k);
            });
            return h;
        },
        favorites() {
            let h = '';
            $.each(cards.list.favorites, function (k, v) {
                h += cards.template(k);
            });
            return h;
        },
    }
};