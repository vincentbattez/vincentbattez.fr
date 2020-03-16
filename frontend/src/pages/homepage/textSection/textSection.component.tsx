import React from 'react';

import { Social } from "../../../components/social/social.component";

export function TextSection({ className, subTitle, title, description, cv }: TextSectionProps) {
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
      <Social
        className="ml-4"
        logoSrc="http://file1.logovector.net/thumbs/49068-linkedin-logo-icon-vector-icon-vector-eps.png"
        url="#"
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
