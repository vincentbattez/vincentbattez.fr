import gql from "graphql-tag";

const HASHTAG_QUERY = gql`
{
  hashtags(sort: "position:asc") {
    label
    position
    hashtag_type {
      name
    }
  }
}
`;

export default HASHTAG_QUERY;
