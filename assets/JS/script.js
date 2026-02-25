const changingTextElement = document.getElementById('changing-text');

const ideas = [
    { text: 'artistic idea', color: '#c28b00' }, // Yellow-orange
    { text: 'painting idea', color: '#0076D3' }, // Blue
    { text: 'sketch idea', color: '#407a52' },   // Green
    { text: 'photography idea', color: '#b50014' }, // Red
    { text: 'DIY project', color: '#5a2b81' }    // Purple
];

let currentIndex = 0;

// Function to handle the text change
function changeText() {
    changingTextElement.style.opacity = 0;
    
    setTimeout(() => {
        currentIndex = (currentIndex + 1) % ideas.length;
        
        // Update the text and the color
        changingTextElement.textContent = ideas[currentIndex].text;
        changingTextElement.style.color = ideas[currentIndex].color;
        
        // 3. Fade the text back in
        changingTextElement.style.opacity = 1;
    }, 500);
}
setInterval(changeText, 3500);