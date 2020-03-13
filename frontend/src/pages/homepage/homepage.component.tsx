import React from 'react';
import { useQuery } from '@apollo/react-hooks'; // @refactor: no api call in component

import HOMEPAGE_QUERY from '../../services/homepage.service'
import { TextSection } from './textSection/textSection.component'
import { ImageSection } from './imageSection/imageSection.component'
import './homepage.component.scss';

function Homepage() {
  const { loading, error, data } = useQuery(HOMEPAGE_QUERY); // @refactor: no api call in component

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  const { homepage } = data;

  return (
    <section className="page-homepage container">
      <TextSection
        className="col-6"
        subTitle={homepage.subTitle}
        title={homepage.title}
        description={homepage.description}
        cv={homepage.cv}
      />
      <ImageSection
        image={homepage.image}
      />
    </section>
    );
}

export default Homepage;
