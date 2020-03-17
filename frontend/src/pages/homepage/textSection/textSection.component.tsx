import React from 'react';

import { SocialCollection } from "../../../components/social/socialCollection.component";
import {useQuery} from "@apollo/react-hooks";
import SOCIAL_COLLECTION_QUERY from "../../../services/social.service";

export function TextSection({ className, subTitle, title, description, cv }: TextSectionProps) {
  const { loading, error, data } = useQuery(SOCIAL_COLLECTION_QUERY); // @refactor: no api call in component

  if (loading) return <p>Loading...</p>;
  if (error) return <p>Error :(</p>;

  const socialCollection = data.socials;

  return (
    <div className={`${className} text-section`}>
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
      <SocialCollection
        socialCollection={socialCollection}
      />
    </div>
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
  className?: string
}
