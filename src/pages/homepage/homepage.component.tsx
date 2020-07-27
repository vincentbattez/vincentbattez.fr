import React from 'react';

import { TextSection } from './textSection/textSection.component'
import { ImageSection } from './imageSection/imageSection.component'

import './homepage.component.scss';
import { homepageData } from '../../data/homepage/homepage.data'

export function Homepage() {
  return (
    <section className="page-homepage container">
      <TextSection
        className="col-7"
        subTitle={homepageData.subTitle}
        title={homepageData.title}
        description={homepageData.description}
        cv={homepageData.cv}
      />
      <ImageSection
        image={homepageData.image}
      />
    </section>
    );
}
