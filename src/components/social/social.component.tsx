import React from 'react';

import './social.component.scss'

export function Social({ className, url, image }: SocialProps) {
  function mouseMove(e:any) {
    const x = e.pageX - e.target.offsetLeft;
    const y = e.pageY - e.target.offsetTop;

    e.target.style.setProperty('--x', `${ x }px`);
    e.target.style.setProperty('--y', `${ y }px`);
  }

  return (
    <a
      href={url}
      className={`${className} social`}
      target="_blank"
      rel="noopener noreferrer"
      onMouseMove={mouseMove}
    >
      <img
        className="social__image"
        src={image.url}
        alt=""
      />
    </a>
  );
}

export type SocialProps = {
  url: string
  image: {
    url: string
  }
  className?: string
}
