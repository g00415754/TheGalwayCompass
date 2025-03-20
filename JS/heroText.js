const fancyText = document.querySelector(".fancy");
const colors = ["#0A1128", "#001F54 ", "#034078", "#1282A2 "];

const addShadowEffect = (element) => {
  const coloredTextShadow = [];
  const blackShadow = [];

  for (let i = 0; i < 100; i++) {  // Reduce count for performance
    const color = colors[i % colors.length];
    const offsetX = i * -1;
    const offsetY = i;
    coloredTextShadow.push(`${offsetX}px ${offsetY}px ${color}`);
  }

  element.style.textShadow = [...coloredTextShadow, ...blackShadow].join(", ");
};

addShadowEffect(fancyText);
