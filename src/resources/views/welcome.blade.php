<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <div x-data="game()" class="px-10 flex items-center justify-center min-h-screen">
            <div class="flex-1 grid grid-cols-4 gap-10">
                <template x-for="card in cards">
                    <div :style="'background: ' + (card.flipped ? card.color : '#999')"
                         class="h-32 cursor-pointer"
                         @click="flipCard(card)"
                    ></div>
                </template>
            </div>
        </div>

        <script>
            function game() {
                return {
                    cards: [
                        { color: 'green', flipped: false, cleared: false },
                        { color: 'red', flipped: false, cleared: false },
                        { color: 'blue', flipped: false, cleared: false },
                        { color: 'yellow', flipped: false, cleared: false },
                        { color: 'green', flipped: false, cleared: false },
                        { color: 'red', flipped: false, cleared: false },
                        { color: 'blue', flipped: false, cleared: false },
                        { color: 'yellow', flipped: false, cleared: false },
                    ],

                    get flippedCards() {
                        return this.cards.filter(card => card.flipped)
                    },

                    flipCard(card) {
                        card.flipped = ! card.flipped

                        if (this.flippedCards.length === 2) {
                            if (this.flippedCards[0]['color'] === this.flippedCards[1]['color']) {
                                alert('you have a match')
                            }
                        }
                    }
                }
            }
        </script>
    </body>
</html>
