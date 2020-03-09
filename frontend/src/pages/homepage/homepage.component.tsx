import React from 'react';
import './homepage.component.scss';

function Homepage() {
  return (
    <section className="homepage container">
      <div className="text-section">
        <h1 className="h2 mt-0 mb-3">Porfolio Développeur Front-End Confirmé</h1>
        <h2 className="h1 mt-0 mb-2">Développeur Front-End Confirmé</h2>
        <p className="p mt-0 mb-4">Je suis à la recherche d’un emploi en tant que développeur Front-End au Canada.</p>

        <a
          className="link"
          href="https://drive.google.com/file/d/1fRVETKDa5nIfmKlxHCIVPr0hVNOYE2lY/view?usp=sharing"
          target="_blank"
          rel="noopener noreferrer"
        >
          Voir mon CV
        </a>
      </div>

      <div className="image-section">
        <img src="../../assets/face-vector.svg" alt=""/>
      </div>
    </section>
    );
}

export default Homepage;
