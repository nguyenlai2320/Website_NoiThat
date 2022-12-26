
const themes = [
    {
      background: "#fff",
      color: "#000",
    },
    {
      background: "#dd9933",
      color: "#FFFFFF",
    },
    {
      background: "#461220",
      color: "#FFFFFF",
    },
    {
      background: "#192A51",
      color: "#FFFFFF",
    },
    {
      background: "#F7B267",
      color: "#000000",
    },
    {
      background: "#F25F5C",
      color: "#000000",
    },
    {
      background: "#231F20",
      color: "#FFF",
    },

  ];
  
  const setTheme = (theme) => {
    const root = document.querySelector(":root");
    root.style.setProperty("--background", theme.background);
    root.style.setProperty("--color", theme.color);
    root.style.setProperty("--primary-color", theme.primaryColor);
  };
  
  const displayThemeButtons = () => {
    const btnContainer = document.querySelector(".theme-btn-container");
    themes.forEach((theme) => {
      const div = document.createElement("div");
      div.className = "theme-btn";
      div.style.cssText = `background: ${theme.background}; width: 25px; height: 25px`;
      btnContainer.appendChild(div);
      div.addEventListener("click", () => setTheme(theme));
    });
  };
  
  displayThemeButtons();


  