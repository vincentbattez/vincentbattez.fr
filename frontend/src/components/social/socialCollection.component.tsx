import React from 'react';

import { SocialProps, Social } from './social.component'
import './socialCollection.component.scss'

export function SocialCollection({ socialCollection}: SocialCollectionProps) {
  return (
    <div className="social-collection ml-4">
      {socialCollection.map(({ url, image  }, key) =>
        <Social
          key={key}
          url={url}
          image={image}
        />
      )}
    </div>
  );
}

type SocialCollectionProps = {
  socialCollection: SocialProps[]
  className?: string
}
