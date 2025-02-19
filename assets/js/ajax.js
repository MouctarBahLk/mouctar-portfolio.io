// Fonction pour supprimer les balises HTML d'une chaîne de caractères HTML
function stripHtmlTags(html) {
  var doc = new DOMParser().parseFromString(html, "text/html");
  return doc.body.textContent || "";
}

// Déclaration de la variable start initialisée à 3
var start = getProjectCount(); //* Sont les mêmes
// var start = 3;

// Déclaration de la variable count initialisée à la valeur renvoyée par la fonction getProjectCount()
var count = getProjectCount();

// Fonction qui retourne le nombre de projets en fonction de la taille de l'écran
function getProjectCount() {
  if (window.innerWidth >= 1140) {
      // Bureau
      return 3;
  } else if (window.innerWidth >= 742) {
      // Tablette
      return 2;
  } else {
      // Téléphone mobile
      return 1;
  }
}

// Fonction pour charger plus de projets
function loadMore() {
  fetch("assets/models/getProjects.php?start=" + start + "&count=" + count)
      .then(function (response) {
          if (response.ok) {
              return response.json();
          }
          throw new Error("La réponse du réseau n'est pas valide.");
      })
      .then(function (projects) {
          // Ajouter les projets à l'élément conteneur
          projects.forEach(function (project) {
              const html = `
                    <li>
                      <img src="/assets/images/${project.img}" alt="${
                  project.imageAlt
              }" />
                      <article>
                        <div>
                          <h2>${project.titre}</h2>
                          <p>${stripHtmlTags(project.descrip).substring(
                              0,
                              350
                          )}...</p>
                        </div>
                        <footer>
                          <a href="projectItem.php?id=${
                  project.id
              }">explorer <i class="mdi mdi-arrow-right-thick" ></i></a>
                        </footer>
                      </article>
                    </li>
                    `;
              document
                  .querySelector("#projects ul")
                  .insertAdjacentHTML("beforeend", html);
          });

          // Mettre à jour l'indice de départ pour l'appel de récupération suivant
          start += count;
          if (areAllProjectsLoaded()) {
              hideLoadButton();
          }
      })
      .catch(function (error) {
          console.error("Erreur :", error);
      });
}

// Sélectionner le bouton de chargement
const loadBtn = document.querySelector("#projects ul ~ button");

// Fonction auto-invoquée pour observer le bouton de chargement
(function () {

  const options = {
      root: null,
      rootMargin: "1px",
      threshold: 0.9,
  };


  const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
          if (entry.isIntersecting) {
              loadMore();
          }
      });
  }, options);

  observer.observe(loadBtn);
})();

// Associer la fonction loadMore() à l'événement 'click' du bouton de chargement
loadBtn.onclick = () => {
  loadMore();
};

// Variable pour stocker la valeur extraite
let extractedValue;

// Fonction asynchrone pour récupérer les projets
async function fetchProjects() {
  try {
      const response = await fetch("assets/php/projectTableSize.php");
      const data = await response.json();
      extractedValue = data;
  } catch (error) {
      console.error(error);
  }
}

// Vérifier si tous les projets ont été chargés
function areAllProjectsLoaded() {
  return start >= extractedValue;
}

// Masquer le bouton de chargement une fois tous les projets chargés
function hideLoadButton() {
  loadBtn.style.display = "none";
}

// Appeler la fonction fetchProjects() pour récupérer les projets
fetchProjects();
