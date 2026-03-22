const cards = document.querySelectorAll(".card");

let firstCard = null;
let secondCard = null;
let lockBoard = false;
let score = 0;
let pairsFound = 0;
const totalPairs = cards.length / 2;

document.addEventListener("DOMContentLoaded", () => {
    cards.forEach(card => {
        card.addEventListener("click", flipCard);
    });
    updateScore();
});

function flipCard() {
    if (lockBoard) return;
    if (this === firstCard) return;

    this.classList.add("flip");

    if (!firstCard) {
        firstCard = this;
        return;
    }

    secondCard = this;
    lockBoard = true;

    checkCards();
}

function checkCards() {
    const match = firstCard.dataset.value === secondCard.dataset.value;

    if (match) {
        disableCards();
        score++;
        pairsFound++;
        updateScore();

        if (pairsFound === totalPairs) {
            setTimeout(() => {
                alert("¡Has ganado! Reiniciando partida...");
                restartGame();
            }, 800);
        }

    } else {
        unflipCards();
    }
}

function disableCards() {
    firstCard.removeEventListener("click", flipCard);
    secondCard.removeEventListener("click", flipCard);
    resetBoard();
}

function unflipCards() {
    setTimeout(() => {
        firstCard.classList.remove("flip");
        secondCard.classList.remove("flip");
        resetBoard();
    }, 1000);
}

function resetBoard() {
    [firstCard, secondCard, lockBoard] = [null, null, false];
}

function updateScore() {
    document.getElementById("score").textContent = "Puntos: " + score;
}

function restartGame() {
    score = 0;
    pairsFound = 0;
    updateScore();

    cards.forEach(card => {
        card.classList.remove("flip");
        card.addEventListener("click", flipCard);
    });

    setTimeout(() => {
        shuffleCards();
    }, 300);
}

function shuffleCards() {
    cards.forEach(card => {
        let randomPos = Math.floor(Math.random() * cards.length);
        card.style.order = randomPos;
    });
}