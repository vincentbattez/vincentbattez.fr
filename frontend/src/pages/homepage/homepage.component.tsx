import React from 'react';
import { useQuery } from '@apollo/react-hooks';
import './homepage.component.scss';

import HOMEPAGE_QUERY from '../../services/homepage.service'

function Homepage() {
  const { loading, error, data } = useQuery(HOMEPAGE_QUERY);

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  const { homepage } = data;

  return (
    <section className="homepage container">
      <TextSection
        subTitle={homepage.subTitle}
        title={homepage.title}
        description={homepage.description}
        cv={homepage.cv}
      />
      <div className="image-section">
        <img
          src={`http://localhost:1337/${homepage.image.url}`}
          alt=""
        />
      </div>
    </section>
    );
}

type TextSectionProps = {
  subTitle: string
  title: string
  description: string
  cv: {
    url: string
    label: string
  }
}

function TextSection({subTitle, title, description, cv}: TextSectionProps) {
  return (
    <div className="text-section">
      <h1 className="h2 mt-0 mb-3">{subTitle}</h1>
      <h2 className="h1 mt-0 mb-2">{title}</h2>
      <p className="p mt-0 mb-4">{description}</p>

      <a
        className="link"
        href={cv.url}
        target="_blank"
        rel="noopener noreferrer"
      >
        {cv.label}
      </a>
    </div>
  )
}

export default Homepage;
