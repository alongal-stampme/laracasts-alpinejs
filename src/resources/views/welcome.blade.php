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
            <h1 class="fixed top-0 right-0 p-10 font-bold text-3xl">
                <span x-text="points"></span>
                <span class="text-xs">pts</span>
            </h1>

            <div class="flex-1 grid grid-cols-4 gap-10">
                <template x-for="card in cards">
                    <div>
                        <button x-show="! card.cleared"
                                :style="'background: ' + (card.flipped ? card.color : '#999')"
                                class="w-full h-32"
                                @click="flipCard(card)"
                        >

                        </button>
                    </div>
                </template>
            </div>
        </div>

        {{-- flash message --}}
        <div x-data="{ show: false, message: 'Default message' }"
             x-show.transition.opacity="show"
             x-text="message"
             @flash.window="
                message = $event.detail.message;
                show=true;
                setTimeout(() => show = false, 1000)
            "
             class="fixed bottom-0 right-0 bg-green-500 text-white p-2 mb-4 mr-4 rounded"
        >
        </div>

        <script>
            function pause(milliseconds = 1000) {
                return new Promise(resolve => setTimeout(resolve, milliseconds))
            }

            function flash(message) {
                window.dispatchEvent(new CustomEvent('flash', {
                    detail: { message }
                }))
            }

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

                    get clearedCards() {
                        return this.cards.filter(card => card.cleared)
                    },

                    get points() {
                        return this.clearedCards.length
                    },

                    get remainingCards() {
                        return this.cards.filter(card => ! card.cleared)
                    },

                    async flipCard(card) {
                        if (this.flippedCards.length === 2) {
                            return
                        }

                        card.flipped = ! card.flipped

                        if (this.flippedCards.length === 2) {
                            if (this.hasMatch()) {
                                flash('You found a match!')
                                await pause()

                                this.flippedCards.forEach(card => card.cleared = true)

                                if (! this.remainingCards.length) {
                                    alert('you won!')
                                }
                            }

                            await pause()

                            this.flippedCards.forEach(card => card.flipped = false)
                        }
                    },

                    hasMatch() {
                        return this.flippedCards[0]['color'] === this.flippedCards[1]['color']
                    }
                }
            }
        </script>
    </body>
</html>
