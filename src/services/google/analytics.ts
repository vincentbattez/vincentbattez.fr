import ReactGA, { EventArgs } from 'react-ga';

declare global {
  interface Window {
    $googleAnalytics: GoogleAnalytics;
  }
}

export class GoogleAnalytics {

  constructor() {
    this.init()
  }

  private init() {
    ReactGA.initialize('UA-111278831-1');
    ReactGA.pageview(window.location.pathname);
  }

  public event(args: EventArgs) {
    console.log('----- event()')
    ReactGA.event(args);
  }
}
