import gql from "graphql-tag";

const NAVBAR_QUERY = gql`
  {
    navbar {
      Link {
        label
        url
      }
      isAvailable
    }
  }
`;

export default NAVBAR_QUERY;
