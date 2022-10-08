import styled from 'styled-components';


export const Text = styled.span`
font-size:${(props) => props.fontSize || "14px"}};
color: ${(props) => props.color || "#000000"};
font-weight: ${(props) => props.fontWeight || "#000000"};
width: ${(props) => props.width || "100%"};
text-align: ${(props) => props.textAlign || "left"};
cursor: ${(props) => props.cursor || ""};
`;
export const Flex = styled.div`
  display: flex;
  text-align: ${(props) => props.align || "left"};
  flex-direction: ${(props) => props.direction || "row"};
  align-items: ${(props) => props.alignItems || "center"};
  justify-content: ${(props) => props.justifyContent || "start"};
  gap: ${(props) => props.gap || "10px"};
  flex-wrap: ${(props) => props.wrap || ""};
  width: ${(props) => props.width || "100%"};
  margin: ${(props) => props.margin || "0px"};
  height: ${(props) => props.height || ""};
  padding: ${(props) => props.padding || "0px"};
  color: ${(props) => props.color || "#fff"};
  background: ${(props) => props.background || "transparent"};
  font-size: ${(props) => props.fontSize || "0.8rem"};
  font-weight: ${(props) => props.fontWeight || "400"};
 
  @media (max-width: 768px) {
    flex-direction: ${(props) => props.directionMobile || "column"};
    align-items: ${(props) => props.alignItemsMobile || "center"};
    justify-content: ${(props) => props.justifyContentMobile || "center"};
    gap: ${(props) => props.gapMobile || "10px"};
    width: ${(props) => props.widthMobile || "100%"};
    height: ${(props) => props.heightMobile || ""};
    padding: ${(props) => props.paddingMobile || "0px"};
    font-size: ${(props) => props.fontSizeMobile || "0.8rem"};
  }

`;